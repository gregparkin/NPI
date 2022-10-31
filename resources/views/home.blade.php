<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Your page title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/redmond/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js"></script>
    <script>
        //<![CDATA[
        $(function () {
            "use strict";
            $("#grid").jqGrid({
                colModel: [
                    { name: "firstName" },
                    { name: "lastName" }
                ],
                data: [
                    { id: 10, firstName: "Angela", lastName: "Merkel" },
                    { id: 20, firstName: "Vladimir", lastName: "Putin" },
                    { id: 30, firstName: "David", lastName: "Cameron" },
                    { id: 40, firstName: "Barack", lastName: "Obama" },
                    { id: 50, firstName: "François", lastName: "Hollande" }
                ]
            });
        });
        //]]>
    </script>
</head>
<body>
<table id="grid"></table>
</body>
</html>
