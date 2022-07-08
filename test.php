<table>
    <tr>
        <th>
            61
        </th>
        <th>
            1
        </th>
        <th>
            2
        </th>
        <th>
            3
        </th>
        <th>
            4
        </th>
        <th>
            Boton
        </th>
    </tr>
    <tr>
        <td>
            Patrick Maia
        </td>
        <td>
            <input class="tblData_Row_1" type="text" />
        </td>
        <td>
            <input class="tblData_Row_1" type="text" />
        </td>
        <td>
            <input class="tblData_Row_1" type="text" />
        </td>
        <td>
            <input class="tblData_Row_1" type="text" />
        </td>
        <td>
            <input id="Button1" type="button" value="Accionar" onclick="fetchGrades('tblData_Row_1');" />
        </td>
    </tr>
    <tr>
        <td>
            Rodrigo Marquez
        </td>
        <td>
            <input class="tblData_Row_2" type="text" />
        </td>
        <td>
            <input class="tblData_Row_2" type="text" />
        </td>
        <td>
            <input class="tblData_Row_2" type="text" />
        </td>
        <td>
            <input class="tblData_Row_2" type="text" />
        </td>
        <td>
            <input id="Button2" type="button" value="Accionar" onclick="fetchGrades('tblData_Row_2');" />
        </td>
    </tr>
</table>
<script>
    function fetchGrades(rowClass) {
    var JSONresults = {};

    var indexColumn = 0;

    $('.' + rowClass).each(function () {
        indexColumn++;
        JSONresults['field_' + indexColumn] = $(this).val();
    });

    alert(JSON.stringify(JSONresults)); //show me my JSON object in string format
}
</script>