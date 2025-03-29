<x-layout>
    <x-slot:heading>
        Product List
    </x-slot>
    <x-table>
    <thead>
            <tr>
                <th scope="col">"#"</th>
                <th scope="col">"Product"</th>
                <th scope="col">"Gender"</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user['id'] }}</th>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['gender'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>