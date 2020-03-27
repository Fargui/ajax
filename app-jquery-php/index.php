<?php require './partials/header.php'?>

        <h1>Les super Users</h1>

        <hr>

        <form onsubmit="return false">
            <label for="user-name">Nom de l'utilisateur</label>
            <input type="text" name="user-name" id="user-name">
            <br>
            <button type="button"  id="add-user">Ajouter</button>
        </form>

        <hr>

        <table id="users" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fistname</th>
                    <th>Lastname</th>
                    <th>Tel number</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>

    <!-- Template pour l'affichage d'un post -->
    <template id="row-user">
        <tr>
            <td>{user_id}</td>
            <td>{user_firstname}</td>
            <td>{user_lastname}</td>
            <td>{user_tel_number}</td>t
        </tr>
    </template>

    <!-- Script Vendor -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>



<!-- ----------------------------------------------------------------------------------------------------------------------------------------- -->




     <!-- Script Custom -->
     <script>
        $(document).ready(() => {
    
            $btnAdd = $('#add-user');
            $user = $('#user-name');
    
            // Affiche la liste des users au chargement de la page
            getUsers();
    
            $btnAdd.on('click', () => {
    
                // console.log( $user.val() );
    
                $.ajax({
                    url: "user.php",
                    method: "POST",
                    data: {
                        name: $user.val() // ATTENTION, CE name est repris en $_POST dans "user.php" 
                    }
                }).always(response => {
    
                    // console.log(response);
                    showUsers(response);
    
                });
            });
        });

       
        // Fonction pour recuperer les users dans le tableau distant cherché par l'url
       
        function getUsers(response){

            $.ajax({
                url: "user.php",
                method: "GET",
                type: "json",
                success: response => {

                  showUsers(response)

                }
            });
        }



        function showUsers(response) {
         
            console.log(response);

            $container = $('#users').find('tbody');
            $tpl = $('#row-user');

                    $container.html('');

                    $(response).each((index, user) => {

                        $item = $tpl.html()
                            .replace(/{user_id}/, index)
                            .replace(/{user_firstname}/, user.firstname)
                            .replace(/{user_lastname}/, user.lastname)
                            .replace(/{user_tel_number}/, user.tel_number);

                        $container.append($item);                
                    }
                    )}
    </script>
</body>

</html>