<head>
    
<link rel="stylesheet" href="header.css">

<header>
    <h1>Cars Spoter</h1>
    <nav>
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="Post.php">Post</a></li>
        <li><a href="login.php">Login/Signin</a></li>
        <li><a href="login.php">Account</a></li>
        <li><a href="admin.php">Admin</a></li>

            <!-- Ajoutez d'autres liens de navigation ici -->

            <!-- Barre de recherche -->
            <li>
                <form action="?controller=search&action=index" method="get">
                    <input type="text" name="query" placeholder="Rechercher">
                    <button type="submit">Research</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
</head>