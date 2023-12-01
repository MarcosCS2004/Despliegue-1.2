<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Alumnos</title>
    <!-- Estilos CSS para la tabla -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f7f7f7;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e6f7ff;
        }
    </style>
</head> <?php

// Incluir el archivo de configuración de la base de datos
include('config_BD.php');

// Ahora puedes usar las constantes para conectar a la base de datos
try {
    $con = new PDO("mysql:host=" . HOST . ";dbname=" . NAME . ";charset=utf8", USER, PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $con->query("SELECT * FROM Alumnos");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Resto del código...
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
<body>
    <h1>Tabla de Alumnos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Media</th>
        </tr>
        <?php while ($alumno = $stmt->fetch()) { ?>
            <tr>
                <td><?php echo $alumno['id']; ?></td>
                <td><?php echo $alumno['nombre']; ?></td>
                <td><?php echo $alumno['apellido']; ?></td>
                <td><?php echo $alumno['media']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
   
