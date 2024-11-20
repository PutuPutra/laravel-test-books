function handleDelete(url) {
    if (confirm("Are you sure you want to delete this item?")) {
        fetch(url, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
                "Content-Type": "application/json",
            },
        })
            .then((response) => {
                if (response.ok) {
                    alert("Item deleted successfully.");
                    location.reload();
                } else {
                    return response.json().then((data) => {
                        throw new Error(
                            data.message || "Failed to delete the item."
                        );
                    });
                }
            })
            .catch((error) => {
                alert("Error: " + error.message);
            });
    }
}
