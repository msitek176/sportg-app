<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/Exercise.php';
require_once __DIR__.'/../repository/ExerciseRepository.php';

session_start();

class ExerciseController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES= ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';

    private $messages = [];
    private $exerciseRepository;

    public function __construct()
    {
        parent:: __construct();
        $this->exerciseRepository = new ExerciseRepository();
    }

    public function exercises(){
        $exercises = $this->exerciseRepository->getExercises();

        $this->render('exercises',['exercises'=>$exercises]);
    }

    public function addExercise()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
               dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $exercise= new Exercise($_POST['name'], $_POST['description'],$_POST['time'],$_POST['reps'],$_POST['series'],$_FILES['file']['name'],$_POST['count'],$_POST['id_exercise']);
            $this->exerciseRepository->addExercise($exercise);
            return $this->render('exercises',[
                'exercises'=> $this ->exerciseRepository->getExercises(),
                'messages'=>$this->messages, 'exercise'=>$exercise]);
        }

        $this->render('add-exercise',['messages'=>$this->messages]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]): '';

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header ('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->exerciseRepository->getExerciseByName($decoded['search']));
        }
    }

    public function addLike(int $id_exercise) {
        $this->exerciseRepository->addLike($id_exercise);
        http_response_code(200);
    }

    public function removeLike(int $id_exercise) {
        $this->exerciseRepository->removeLike($id_exercise);
        http_response_code(200);
    }

    private function validate(array $file):bool
    {
        if($file['size']>self::MAX_FILE_SIZE){
            $this->messages[]='File is too large for destination file system.';
            return false;
        }

        if(!isset($file['type']) || !in_array($file['type'],self::SUPPORTED_TYPES)){
            $this->messages[]='File type is not supported';
            return false;
        }
        return true;
    }
}