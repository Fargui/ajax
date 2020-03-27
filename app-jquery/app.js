// https://jsonplaceholder.typicode.com/posts
$(document).ready(() => {

    // Bouton
    $btn = $('#get-posts');

    // Conteneur des posts
    $container = $('#posts');

    // Template d'un post
    $tpl = $('#post');

    // Evenement de clique sur le bouton
    $btn.on('click', () => {

        $
            // Execution d'un requete assynchrone
            .ajax('https://jsonplaceholder.typicode.com/posts')

            // Code a executer lorsque la requete se passe bien
            // Code HTTP : 200
            .done((response) => {
                $(response).each((index, item) => {
                    $item = $tpl.html()
                        .replace(/{post_id}/, item.id)
                        .replace(/{post_title}/, item.title)
                        .replace(/{post_content}/, item.body)
                    ;

                    $container.append($item);
                });
            })

            // Code a executer lorsque la requete est en echec
            .fail(() => {
                console.log("Erreur lors de la requete.");
            })

            // Code a toujours executer, peu importe le code HTTP
            .always(() => {
                console.log("Je m'execute toujours lorsque la requete est terminée.");
            })
        ;

    });

});