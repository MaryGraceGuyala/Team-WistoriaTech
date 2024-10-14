fetch('dashboard_data.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('families-assisted-count').innerHTML = data.families_assisted;
            document.getElementById('members-count').innerHTML = data.members;
            document.getElementById('donations-amount').innerHTML = data.donations;
            document.getElementById('medicines-count').innerHTML = data.medicines;

            const visitationsData = data.visitations;
            const visitationsTable = document.getElementById('visitations-data');
            visitationsTable.innerHTML = '';

            visitationsData.forEach(visit => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${visit.date}</td>
                    <td>${visit.time}</td>
                    <td>${visit.address}</td>
                    <td>${visit.purpose}</td>
                    <td>${visit.status}</td>
                `;
                visitationsTable.appendChild(row);
            });
});
