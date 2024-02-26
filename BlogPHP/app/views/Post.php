<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Post.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="blog-post">
            <h2>Create Post</h2>

            <form action="process_post.php" method="post" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="10" cols="30" required></textarea>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image">

                <button type="submit">Post</button>
            </form>
        </section>
    </main>
</body>
</html>
