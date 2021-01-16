<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Exercise.php';


class ExerciseRepository extends Repository
{

        public function getExercise(string $id_exercise): ?Exercise
        {
            $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.exercise WHERE id_exercise = :id_exercise
            ');
            $stmt->bindParam(':id_exercise',$id_exercise,PDO::PARAM_INT);
            $stmt->execute();

            $exercise = $stmt->fetch(PDO::FETCH_ASSOC);

            if($exercise == false){
                return null; //exeption better option
            }

            return new Exercise(
                $exercise['name'],
                $exercise['description'],
                $exercise['time'],
                $exercise['series'],
                $exercise['reps'],
                $exercise['image']
            );
        }

        public function addExercise (Exercise $exercise): void
        {
            $date = new DateTime();
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public.exercise_create (id_user, created_at)
            VALUES (?,?);
            ' );

            $id_user=1;

            $stmt->execute([
               $id_user,
               $date->format('Y-m-d'),
            ]);

            $stmt = $this->database->connect()->prepare('
            INSERT INTO public.exercises (name, description, time, series, reps, image)
            VALUES (?, ?, ?, ?, ?, ?)
            ' );

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
        $result =[];

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM exercises
        ');
        $stmt->execute();
        $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($exercises as $exercise){
            $result[] = new Exercise(
                $exercise['name'],
                $exercise['description'],
                $exercise['series'],
                $exercise['reps'],
                $exercise['image'],
                $exercise['time']

            );
        }

        return $result;
    }

}