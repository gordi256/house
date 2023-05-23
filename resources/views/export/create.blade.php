<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">№ п/п</th>
            <th scope="col">Наименование </th>
            <th scope="col">Отметка при наличии повреждений</th>
            <th scope="col">Ед.изм.</th>
            <th scope="col">Ориентировочный объём работ,кол-во</th>
            <th scope="col">Степень важности исполнения, оценка рисков при эксплуатации "Опасность в эксплуатации"
                (опасно / безопасно) </th>
            <th scope="col">Примечание, дополнение</th>
            <th scope="col">Стоимость на ед., руб.</th>
            <th scope="col">Ориентировочная стоимость работ, руб.</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->index }}</td>
                <td>{{ $item->item->name }}</td>
                <td>{{ $item->check }}</td>
                <td>{{ $item->item->unit }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->rating }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->rate * $item->value }}</td>
                <td></td>

            </tr>
        @endforeach
        <tr>
            <td></td>
            <td>Итого </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
