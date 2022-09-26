<!DOCTYPE html>
<?php
    $dsn = 'mysql:host=localhost; dbname=my_guitar_shop1';
    $username = 'root';
    $password = '';

//  Connecting using PDO object from class
    $db = new PDO($dsn, $username, $password);
    try {
        $db = new PDO($dsn, $username, $password);
        // Hiding this for formatting, uncomment if it is needed
        // echo '<p>You are connected to the database!</p>';
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo '<p>An error occurred while connecting to the database: $error_message </p>';
        }
//  Select query to build the table
//  Going to adjust code from class to do inner join
//  $query = 'select * FROM products';
//  Information I need to inner join:
//  Products table: products(productID), categories(categoryName), products(productName), products(listPrice)
//  inner join
//  Categories table: products categoryID -> categoriesID
    $query = 'select
                products.productID, categories.categoryName, products.productName, products.listPrice from products
                inner join categories on products.categoryID = categories.categoryID';
    $statement = $db->prepare($query);
    if ($statement === false) {
    echo '<p>An error occurred while running the query</p>';
}
    $statement->execute();
    $data = $statement->fetchAll()

?>
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="main.css" />
</head>

<!-- the body section -->
<body>
<main>

    <h1>Product List</h1>
    <section>
        <!-- display a table of products -->
        <table>
            <tr>
<!--                //This will start a new row for column title-->
<!--                //Use th to display each column title.-->
<!--                //Repeat as many times as number of columns-->
                <th>Product ID</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>List Price</th>
            </tr>
<!--            //This will end the first row.-->
<!---->
<!--            //Start for each loop-->
<!--            code from class-->
<!--            --><?php //foreach ($products as$product) :
//                echo $product['productCode'] . ‘<br>’;
//                echo $product['productName'] . ‘<br>’;
//                echo $product['listPrice'] . ‘<br>’;
//            endforeach;
//            ?>
            <?php
                foreach ($data as $row)
                {
            ?>

            <tr>
<!--                //This will start a new row-->
<!--                //Use td to display a cell in the row.-->
<!--                //Repeat as many times as the number of columns.-->
                <td><?php echo $row['productID'] ?></td>
                <td><?php echo $row['categoryName'] ?></td>
                <td><?php echo $row['productName'] ?></td>
                <td><?php echo $row['listPrice'] ?></td>
            </tr>
<!--            //End the row-->
<!--            //End of foreach loop-->
            <?php
                }
            ?>
        </table>
<!--        //End of the table-->

    </section>
</main>
</body>


