const form = document.getElementById("personForm");
const message = document.getElementById("message");
const table = document.getElementById("peopleTable");

form.addEventListener("submit", async function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    try {
        const response = await fetch("add_person.php", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (!data.success) {
            message.textContent = data.message;
            message.className = "error";
            return;
        }

        const row = document.createElement("tr");
        row.id = `row-${data.id}`;

        row.innerHTML = `
            <td>${data.id}</td>
            <td>${data.name}</td>
            <td>${data.age}</td>
            <td class="status">${data.status}</td>
            <td>
                <button class="toggle-btn" onclick="toggleStatus(${data.id})">
                    Toggle
                </button>
            </td>
        `;

        table.appendChild(row);

        form.reset();
        message.textContent = "Data saved successfully!";
        message.className = "success";
    } catch (error) {
        message.textContent = "An error occurred. Please try again.";
        message.className = "error";
    }
});

async function toggleStatus(id) {
    const formData = new FormData();
    formData.append("id", id);

    try {
        const response = await fetch("toggle.php", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (!data.success) {
            alert(data.message);
            return;
        }

        const row = document.getElementById(`row-${id}`);
        row.querySelector(".status").textContent = data.status;
    } catch (error) {
        alert("Could not update the status.");
    }
}