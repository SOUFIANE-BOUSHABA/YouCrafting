<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCrafting</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include 'article.php';

    $articleManager = new Articlee();
    ?>

    <div class="container mt-5">

        <form action="add.php" method="post" class="mb-3">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre:</label>
                <input type="text" name="titre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu:</label>
                <textarea name="contenu" class="form-control" required></textarea>
            </div>
            <button type="submit" id="submitBtn" class="btn btn-primary">Ajouter</button>
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
            <?php



                $articles = $articleManager->getArticles();
                foreach ($articles as $article) {
                ?>
                <tr>
                    <td><?php echo $article['Id']; ?></td>
                    <td><?php echo $article['titre']; ?></td>
                    <td><?php echo $article['contenu']; ?></td>
                    <td>
                     
                           
                    <button type="button" onclick="deleteArticle(<?php echo $article['Id']; ?>)" class="btn btn-danger">Supprimer</button>
                     

                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updateModal<?php echo $article['Id']; ?>">
                            Modifier
                        </button>

                        <div class="modal fade" id="updateModal<?php echo $article['Id']; ?>" tabindex="-1"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Modifier l'article</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="update.php" class="formupdate" method="post">
                                            <input type="hidden" name="article_id"
                                                value="<?php echo $article['Id']; ?>">
                                            <div class="mb-3">
                                                <label for="nouveau_titre" class="form-label">Nouveau titre:</label>
                                                <input type="text" name="nouveau_titre" class="form-control"
                                                    value="<?php echo $article['titre']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nouveau_contenu" class="form-label">Nouveau contenu:</label>
                                                <textarea name="nouveau_contenu"
                                                    class="form-control"><?php echo $article['contenu']; ?></textarea>
                                            </div>
                                            <button type="submit"  class="btn btn-primary">Enregistrer les
                                                modifications</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>