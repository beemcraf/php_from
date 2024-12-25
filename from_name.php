<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        ชื่อจริง : <input type="text" name="name"><br>
        ชื่อเล่น : <input type="text" name="email"><br>
        <input type="submit">
    </form>

    <?php
    // แสดงเนื้อหาจากไฟล์ myname.txt
    $myfile = fopen("myname.txt", "r") or die("Unable to open file!");
    echo fgets($myfile);
    fclose($myfile);

    // บันทึกข้อมูลลงใน student.txt หากมีข้อมูลจากฟอร์ม
    if (isset($_GET['name']) && isset($_GET['email'])) {
        $name = htmlspecialchars($_GET['name']);
        $email = htmlspecialchars($_GET['email']);

        $file = fopen("student.txt", "a") or die("Unable to open file!");
        $data = "ชื่อจริง: $name, Email: $ชื่อเล่น\n";
        fwrite($file, $data);
        fclose($file);

        echo "Data saved successfully!";
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET' && (!isset($_GET['name']) || !isset($_GET['email']))) {
        echo "Please provide both name and email.";
    }
    ?>
</body>
</html>
