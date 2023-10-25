<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Printful test</title>
    <link href="../css/styles.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="../js/scripts.js"></script>
</head>
<body>
<header>
    <button onclick="fetchProducts()">Fetch products</button>
    <button onclick="getStatistics()">Get statistics</button>
</header>
<div id="container">
        <table>
            <thead>
            <tr>
                <th>
                    Product id
                </th>
                <th>
                    Product title
                </th>
                <th>
                    Variant id
                </th>
                <th>
                    Variant title
                </th>
                <th>
                    Variant price
                </th>
            </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
        <div>
            <table id="statistics">
                <thead>
                <th>Minimum price</th>
                <th>Maximum price</th>
                <th>Average price</th>
                </thead>
                <tbody>
                <td id="min-price">

                </td>
                <td id="max-price">

                </td>
                <td id="avg-price">

                </td>
                </tbody>
            </table>
        </div>



</div>
</body>
</html>