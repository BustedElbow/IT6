<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movies</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
  
    <?php require('partials/sidebar.php'); ?>

    <main>
        <div class="tablebody">
            <div class="mov">
                <h1>MOVIES</h1>
                <button>Add</button>
            </div>
            <div class="tablecontainer">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Release</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>The Lorax</td>
                            <td>2012</td>
                            <td>4/5</td>
                        </tr>
                        <tr>
                            <td>Sausage Party</td>
                            <td>2016</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Equalizer</td>
                            <td>2014</td>
                            <td>4.5/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>