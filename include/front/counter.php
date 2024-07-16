
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title> categorie | <?php echo  $categorie ['libelle']  ?></title>
    </head>
    <body>
        

    
    <button type="button"     class="btn btn-primary mx-1">-</button>
        <input type="number"     class="form-control" value="1"   id = "qty" min="1">
        <button type="button"  class="btn btn-primary mx-1">+</button>


        <button type="button"     class="btn btn-primary mx-1">-</button>
        <input type="number"     class="form-control" value="1"   id = "qty" min="1">
        <button type="button"  class="btn btn-primary mx-1">+</button>
    

    <script>document.addEventListener('DOMContentLoaded', (event) => {
    // Sélectionner tous les éléments de la classe
    const products = document.querySelectorAll('.product');

    products.forEach(product => {
        const numberInput = product.querySelector('.numberInput');
        const incrementButton = product.querySelector('.increment');
        const decrementButton = product.querySelector('.decrement');

        incrementButton.addEventListener('click', () => {
            numberInput.value = parseInt(numberInput.value) + 1;
        });

        decrementButton.addEventListener('click', () => {
            if (parseInt(numberInput.value) > parseInt(numberInput.min)) {
                numberInput.value = parseInt(numberInput.value) - 1;
            }
        });
    });
});</script>
    </body>

    </html>
