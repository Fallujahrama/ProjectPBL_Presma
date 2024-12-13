<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-5">CRUD Table</h1>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-lg rounded border border-gray-300">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">NIM</th>
                        <th class="px-4 py-2">Sakit</th>
                        <th class="px-4 py-2">Izin</th>
                        <th class="px-4 py-2">Alpa</th>
                        <th class="px-4 py-2">IPK</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- Rows will be dynamically added here -->
                </tbody>
            </table>
        </div>

        <!-- Add/Edit Form -->
        <div class="mt-5 bg-white p-5 shadow-lg rounded border border-gray-300">
            <h2 class="text-2xl font-bold mb-4" id="form-title">Add Entry</h2>
            <form id="crud-form">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" id="nim" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="sakit" class="form-label">Sakit</label>
                    <input type="number" id="sakit" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="izin" class="form-label">Izin</label>
                    <input type="number" id="izin" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="alpa" class="form-label">Alpa</label>
                    <input type="number" id="alpa" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="ipk" class="form-label">IPK</label>
                    <input type="number" step="0.01" id="ipk" class="form-control" required />
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button><br>
            </form>
            <a href="dataPresmaSup.php">
                <button class="btn btn-secondary mb-5" onclick="goBack()">Kembali</button>
            </a>
        </div>
    </div>

    <!-- JavaScript for CRUD functionality -->
    <script>
        let editingIndex = -1;

        document.getElementById('crud-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const nama = document.getElementById('nama').value;
            const nim = document.getElementById('nim').value;
            const sakit = document.getElementById('sakit').value;
            const izin = document.getElementById('izin').value;
            const alpa = document.getElementById('alpa').value;
            const ipk = document.getElementById('ipk').value;

            const tableBody = document.getElementById('table-body');

            if (editingIndex === -1) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-4 py-2 border">${nama}</td>
                    <td class="px-4 py-2 border">${nim}</td>
                    <td class="px-4 py-2 border">${sakit}</td>
                    <td class="px-4 py-2 border">${izin}</td>
                    <td class="px-4 py-2 border">${alpa}</td>
                    <td class="px-4 py-2 border">${ipk}</td>
                    <td class="px-4 py-2 border">
                        <button class="btn btn-warning btn-sm" onclick="editRow(this)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            } else {
                const rows = tableBody.getElementsByTagName('tr');
                const row = rows[editingIndex];
                row.innerHTML = `
                    <td class="px-4 py-2 border">${nama}</td>
                    <td class="px-4 py-2 border">${nim}</td>
                    <td class="px-4 py-2 border">${sakit}</td>
                    <td class="px-4 py-2 border">${izin}</td>
                    <td class="px-4 py-2 border">${alpa}</td>
                    <td class="px-4 py-2 border">${ipk}</td>
                    <td class="px-4 py-2 border">
                        <button class="btn btn-warning btn-sm" onclick="editRow(this)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Delete</button>
                    </td>
                `;
                editingIndex = -1;
                document.getElementById('form-title').innerText = 'Add Entry';
                document.getElementById('cancel-button').classList.add('hidden');
            }

            this.reset();
        });

        document.getElementById('cancel-button').addEventListener('click', function() {
            editingIndex = -1;
            document.getElementById('crud-form').reset();
            document.getElementById('form-title').innerText = 'Add Entry';
            this.classList.add('hidden');
        });

        function editRow(button) {
            const row = button.parentElement.parentElement;
            const cells = row.getElementsByTagName('td');

            document.getElementById('nama').value = cells[0].innerText;
            document.getElementById('nim').value = cells[1].innerText;
            document.getElementById('sakit').value = cells[2].innerText;
            document.getElementById('izin').value = cells[3].innerText;
            document.getElementById('alpa').value = cells[4].innerText;
            document.getElementById('ipk').value = cells[5].innerText;

            editingIndex = Array.from(row.parentElement.children).indexOf(row);
            document.getElementById('form-title').innerText = 'Edit Entry';
            document.getElementById('cancel-button').classList.remove('hidden');
        }

        function deleteRow(button) {
            button.parentElement.parentElement.remove();
        }
    </script>
</body>

</html>