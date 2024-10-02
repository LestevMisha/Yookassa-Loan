<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yookassa Integration</title>
</head>

<body>

    <div class="cards" style="display: flex; flex-direction: row; gap: 2rem; margin: 0 auto; width: fit-content; margin-top: 2rem;">

        <!-- Card 1 -->
        <div class="card-1">
            <div class="b-text">Card 1 от 27990 ₽</div>
            <p class="b-desc">Something about it 1</p>
            <form action="payment.php" method="POST">
                <input name="price" value="27990" hidden>
                <input name="category" value="1" hidden>
                <input type="submit" value="Купить"></input>
            </form>
        </div>

        <!-- Card 2 -->
        <div class="card-2">
            <div class="b-text">Card 2 от 41 990 ₽</div>
            <p class="b-desc">Something about it 2</p>
            <form action="payment.php" method="POST">
                <input name="price" value="41990" hidden>
                <input name="category" value="2" hidden>
                <input type="submit" value="Купить"></input>
            </form>
        </div>

        <!-- Card 3 -->
        <div class="card-2">
            <div class="b-text">Card 3 от 62 990 ₽</div>
            <p class="b-desc">Something about it 3</p>
            <form action="payment.php" method="POST">
                <input name="price" value="62990" hidden>
                <input name="category" value="3" hidden>
                <input type="submit" value="Купить"></input>
            </form>
        </div>

    </div>


</body>

</html>