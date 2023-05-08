<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test Bosh</title>
    </head>
    <body>
        <style>
            table {

                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
        </style>
        <div>
            <h1> add contacts </h1>
            <form action="" method="post">
                <label> Vorname </label>
                <input type="text" name="first_name"/> <br>
                <label> Nachname </label> 
                <input type="text" name="last_name"/> <br>
                <label> Telephone </label>
                <input type="number" name="phone_number"/>
                <button type="submit">
                    add 
                </button>
            </form>
        </div>
        <div>
            <h1>
                list of contacts
            </h1>
        </div>
        <div>
            <form action="" method="post">
                <input min="2" type="number" name="search" id="search"/>
                <button type="submit">
                    Search
                </button>
            </form>
            <br>

        </div>
        <table>
            <thead>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname
                    </th>
                    <th>Phone
                    </thv>
                </tr>
            </thead>
            <?php foreach ($datas as $contact) :  ?>
            <tbody>
                <tr>
                    <td >
                        <?= $contact['first_name'] ?>
                    </td>
                    <td ><?= $contact['last_name'] ?>
                    </td>
                    <td ><?= $contact['phone_number'] ?></td>
                </tr>
            </tbody>
            <?php endforeach ?>
        </table>

    </body>
</html>