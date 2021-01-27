<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Exercise.php';

session_start();

class ExerciseRepository extends Repository
{
    public function addExercise(Exercise $exercise): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO exercise_create (id_user, created_at)
            VALUES (?,?);
            ');

        $stmt->execute([
            $_SESSION['user_id'],
            $date->format('Y-m-d'),
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO exercises (name, description, time, series, reps, image)
            VALUES (?, ?, ?, ?, ?, ?)
            ');

        $stmt->execute([
            $exercise->getName(),
            $exercise->getDescription(),
            $exercise->getTime(),
            $exercise->getSeries(),
            $exercise->getReps(),
            $exercise->getImage()
        ]);
    }

    public function getExercises(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT exercises.*, CASE WHEN ela.count is NULL THEN 0 ELSE ela.count END FROM exercises LEFT JOIN exercise_like_amount ela on exercises.id_exercise = ela.id_exercise
        ');
        $stmt->execute();
        $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($exercises as $exercise) {
            $result[] = new Exercise(
                $exercise['name'],
                $exercise['description'],
                $exercise['time'],
                $exercise['series'],
                $exercise['reps'],
                $exercise['image'],
                $exercise['count'],
                $exercise['id_exercise']
            );
        }

        return $result;
    }

    public function getExerciseByName(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT exercises.*, CASE WHEN ela.count is NULL THEN 0 ELSE ela.count END FROM exercises LEFT JOIN exercise_like_amount ela on exercises.id_exercise = ela.id_exercise WHERE LOWER (name) LIKE :search OR LOWER (description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addLike(int $id_exercise)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO exercise_likes VALUES (?, ?)
         ');

        $stmt->execute([$_SESSION['user_id'], $id_exercise]);
    }

    public function removeLike(int $id_exercise)
    {

        $stmt = $this->database->connect()->prepare('
            DELETE FROM exercise_likes WHERE id_user=:id_user AND id_exercise=:id_exercise
         ');

        $stmt->execute([$_SESSION['user_id'], $id_exercise]);
    }

    public function exerciseDoneDB($id_exercise,$date,$time,$note){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO done_exercise(id_user,id_exercise,date,time,note)
            VALUES (?,?,?,?,?)
         ');

        $stmt->execute([
            $_SESSION['user_id'],
            $id_exercise,
            $date,
            $time,
            $note
        ]);
    }

    public function selectData($id_user){
        $stmt = $this->database->connect()->prepare('
        SELECT date, done_exercise.time, note, name FROM done_exercise JOIN exercises e on done_exercise.id_exercise = e.id_exercise WHERE id_user =? ORDER BY date DESC 
         ');

        $stmt->execute([
            $id_user
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}