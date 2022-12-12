<?php
   include __DIR__ . "/../source/connection.php";
   $query = "SELECT * 
             FROM specialties";
   $stmt = $conn->query($query);
   $specialties = $stmt->fetchAll();
?>

<form >
    <div>
        Nome: <input name="name" type="text">
    </div>
    <div>
        CRM: <input name="document" type="text">
    </div>
    <div>
        Especialidade:
        <select name="specialty">
            <?php
              foreach ($specialties as $specialty){
                echo "<option value='{$specialty->id}'>{$specialty->description}</option>";
              }
            ?>
        </select>
    </div>
    <button>Salvar</button>
</form>
