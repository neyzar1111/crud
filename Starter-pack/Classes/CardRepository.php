<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(): void
    {
        if(isset($_POST['submitNewCard'])) {
            $userCard = $_POST["userCard"];
            $sql = "INSERT INTO crud_table (book_name) VALUES ('$userCard')";
            $this->databaseManager->connection->query($sql);
        }

    }

    // Get one
    public function find(): array
    {


    }

    // Get all
    public function get(): array
    {
        // TODO: replace dummy data by real one
        $sql = "SELECT * FROM crud_table";
        $databaseConnection = $this->databaseManager->connection;
        $result = $databaseConnection->query($sql)->fetchAll();
        return $result;

        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function update()
    {
        if(isset($_POST['submitChanges'])&& !empty($_POST['bookName'])){
            echo'========';
            var_dump($_POST);
            $bookFrom = $_POST['selectBook'];
            $bookTO = $_POST["bookName"];
            echo'========';
            $sql = "UPDATE `crud_table` SET book_name='$bookTO' WHERE book_name='$bookFrom'";
            $this->databaseManager->connection->query($sql);
            $this->get();
        }

    }

    public function delete(): void
    {

    }

}
