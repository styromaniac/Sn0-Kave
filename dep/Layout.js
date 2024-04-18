window.addEventListener('DOMContentLoaded', () => {
    const mediaContainer = document.getElementById('media');
    let columns = []; // Array to hold the column divs
    let mediaItems = Array.from(mediaContainer.children); // Store initial media items

    // Function to create columns
    function createColumns(numColumns, margin) {
        mediaContainer.innerHTML = ''; // Clear the container to remove old columns
        columns = []; // Clear old column references

        for (let i = 0; i < numColumns; i++) {
            const column = document.createElement('div');
            column.style.width = `${100 / numColumns}%`;
            column.style.boxSizing = 'border-box';
            column.style.display = 'inline-block';
            column.style.verticalAlign = 'top';
            column.style.margin = margin;
            columns.push(column);
            mediaContainer.appendChild(column);
        }
    }

    // Function to distribute media items to columns
    function distributeMedia() {
        columns.forEach(column => column.innerHTML = ''); // Clear columns before redistribution
        mediaItems.forEach((item, index) => {
            const column = columns[index % columns.length];
            column.appendChild(item);
        });
    }

    // Handle resize or orientation change
    function handleResize() {
        const isLandscape = window.matchMedia("(orientation: landscape)").matches;
        const numColumns = isLandscape ? 4 : 2;
        const margin = isLandscape ? '0 -7px' : '0 -10px'; // Set different margins for landscape and portrait
        createColumns(numColumns, margin);
        distributeMedia();
    }

    // Attach resize event listener
    window.addEventListener('resize', handleResize);

    // Initial setup
    handleResize();
});