<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCrafting</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
 

    <div class="container mt-5">

        <form id="addArticleForm" class="mb-3">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre:</label>
                <input type="text" name="titre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu:</label>
                <textarea name="contenu" class="form-control" required></textarea>
            </div>
            <button type="button" id="submitBtn" class="btn btn-primary">Ajouter</button>
        </form>

        <h2>Liste des articles</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="demo">

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>