document.addEventListener('DOMContentLoaded', () => {
    const changes = {};

    const saveButton = document.getElementById('save-button');

    const showSaveButton = () => {
        saveButton.style.display = 'block';
    };

    const saveChanges = () => {
        console.log('Saving changes:', changes);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onload = () => {
            console.log('Raw response:', xhr.responseText);
            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        alert('Changes saved successfully!');
                        saveButton.style.display = 'none';
                    } else {
                        alert('Failed to save changes: ' + (response.message || 'Unknown error'));
                    }
                } catch (e) {
                    alert('Failed to parse server response as JSON. Please check the server logs.');
                    console.error('Error parsing response:', e);
                    console.log('Response was:', xhr.responseText);
                }
            } else {
                alert('Failed to save changes. Server returned status: ' + xhr.status);
            }
        };

        xhr.onerror = () => {
            alert('An error occurred while saving changes.');
            console.error('Network error occurred:', xhr);
        };

        xhr.send(JSON.stringify(changes));
    };

    const excludedElements = ['BODY', 'HTML', 'BUTTON'];

    document.body.querySelectorAll('*').forEach(element => {
        if (!excludedElements.includes(element.tagName) && element.id !== 'save-button') {
            element.setAttribute('contenteditable', 'true');
            element.setAttribute('id', 'editable-' + Math.random().toString(36).substr(2, 9));
        }

        if (element.tagName === 'IMG') {
            element.addEventListener('click', () => {
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'image/*';
                fileInput.addEventListener('change', () => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        element.src = e.target.result;
                        changes[element.id] = { attribute: 'src', value: element.src };
                        showSaveButton();
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                });
                fileInput.click();
            });
        }

        if (element.tagName === 'A') {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                const newHref = prompt('Enter new URL:', element.href);
                if (newHref) {
                    element.href = newHref;
                    changes[element.id] = { attribute: 'href', value: newHref };
                    showSaveButton();
                }
            });
        }

        element.addEventListener('input', () => {
            changes[element.id] = { attribute: 'innerHTML', value: element.innerHTML };
            showSaveButton();
        });
    });

    saveButton.addEventListener('click', () => {
        console.log('Save button clicked');
        saveChanges();
    });

    console.log('DOM fully loaded and parsed');
});
