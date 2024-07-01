<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<div>

    <body>
        <div>
            <div>
                <h1 class="font-bold uppercase p-4 border">
                    <a href="index.html">Movie Manager</a>
                </h1>
            </div>

        </div> <!-- sidebar-->

        <ul class="text-white fixed font-semibold p-2 w-36 h-screen bg-gray-800 divide-y">
            <li class="">
                <a href="#">
                    <span>Search</span>
                </a>
            </li>
            <li class=>
                <a href="#">
                    <span>Home</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <span>Your Movies</span>
                </a>
            </li>
            <li class="">
                <a href="AddMovies.html">
                    <span>Add Movies</span>
                </a>
            </li>
        </ul>
        </nav>


        <div class="flex justify-center items-start h-screen pl-12rem">
            <form>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title">
                <label for="director">Director:</label>
                <input type="text" id="director" name="director">
                <label for="year"
                    class="bg-pink-500 hover:bg-blue-700 text-white font-bold py-0.5 px-4 rounded">Year:</label>
                <input type="text" id="year" name="year" class="border-blue-500">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a
                        href="index.html">Add
                        Movie</a></button>
            </form>
        </div>
    </body>
</div>



<body class="flex">
    <nav>
        <ul class="text-white font-semibold p-2 w-36 h-screen bg-gray-800 divide-y">
            <span class="">Movie Manager</span>
            <li class="">
                <a href="#">
                    <span>Search</span>
                </a>
            </li>
            <li class=>
                <a href="index.html">
                    <span>Home</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <span>Your Movies</span>
                </a>
            </li>
            <li class="">
                <a href="AddMovies.html">
                    <span>Add Movies</span>
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Year</th>
                </tr>
            <tbody>
                <tr>
                    <td>The Lorax</td>
                    <td>Dr. Seuss</td>
                    <td>1961</td>
                </tr>
                <tr>
                    <td>Witch Woman</td>
                    <td>The Eagles</td>
                    <td>1972</td>
                </tr>
                <tr>
                    <td>Shining Star</td>
                    <td>Earth, Wind, and Fire</td>
                    <td>1975</td>
                </tr>
            </tbody>
            </thead>
        </table>
    </main>
</body>

</html>