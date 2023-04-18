<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Celke - Cadastrar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- <button><a href="index.php">Listar</a></button><br>
     <button><a href="create.php">Cadastrar</a></button><br>  -->





    <?php
    require './Conn.php';
    require './User.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData['SendAddUser'])) {
        // var_dump($formData);
        // die();
        $createUser = new User();
        $createUser->formData = $formData;
        $value = $createUser->create();

        if ($value) {
            // $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
            header("Location: index.php");
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        }
    }

    ?>

    <form id="product_form" name="CreateUser" method="POST" action="">

        <div class="jaca">
            <h1>Product Add</h1>

            <div class="buttons">
                <input href="index.php" type="submit" value="ADD" name="SendAddUser" />
                <input type="reset" value="CANCEL">
            </div>

        </div>

        <br><br>


        <div class="main">

            <label>SKU: </label>
            <input id="sku" type="text" name="sku" placeholder="" required /><br><br>

            <label>Name: </label>
            <input id="name" type="name" name="name" placeholder="" required /><br><br>

            <label>Price: </label>
            <input id="price" type="price" name="price" placeholder="" required /><br><br><br>

            <label id="productType" for="typeswitcher">Type Switcher</label>
            <select name="type" id="typeswitcher">
                <option value="DVD"></option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>

        </div>

        <br><br>

        <div id="dimensions" style="display:none">
            <label for="height">Height:</label>
            <input id="height" type="text" name="dimension1" placeholder=""><br>
            <label for="width">Width:</label>
            <input id="width" type="text" name="dimension2" placeholder=""><br>
            <label for="length">Length:</label>
            <input id="length" type="text" name="dimension3" placeholder="">
            <br><br>
            <p>Provide the width, height and length!</p>
        </div>

        <div id="book-dimensions" style="display:none">
            <label>Weight (kg):</label>
            <input type="text" name="book_weight" /><br><br>
            <p>Provide the Weight of the book!</p>
        </div>

        <div id="size-container" style="display: none;">
            <label for="size">Size (mb):</label>
            <input id="size" type="text" name="dvd_size" /><br><br>
            <p>Provide the size of the dvd!</p>
        </div>

        <br><br>

    </form>

    <script>
        const optionElements = {
            DVD: ['size-container'],
            Book: ['book-dimensions'],
            Furniture: ['dimensions']
        };

        const dimensionsElements = {
            'book-dimensions': ['book'],
            'dimensions': ['dimension'],
            'size-container': ['weigh']
        };

        document.getElementById('typeswitcher').addEventListener('change', function() {
            const selectedValue = this.value;
            const elementsToShow = optionElements[selectedValue];
            const elementsToHide = Object.values(optionElements).flat().filter(element => !elementsToShow.includes(element));

            elementsToShow.forEach(element => document.getElementById(element).style.display = 'block');
            elementsToHide.forEach(element => document.getElementById(element).style.display = 'none');

            const dimensionsToShow = dimensionsElements[elementsToShow[0]] || [];
            const dimensionsToHide = Object.values(dimensionsElements).flat().filter(element => !dimensionsToShow.includes(element));

            dimensionsToShow.forEach(element => document.getElementById(element).style.display = 'block');
            dimensionsToHide.forEach(element => document.getElementById(element).style.display = 'none');
        });
    </script>





</body>

</html>