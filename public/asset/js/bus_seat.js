const seatButtons = document.querySelectorAll('.bus-seat');
const resultTableBody = document.querySelector('#resultTable tbody');
const totalFareElement = document.getElementById('totalFare');
const noSeatRow = document.getElementById('noSeatRow');
let selectedSeats = 1;
let totalFare = 0;

seatButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (button.classList.contains('selected')) {
            button.classList.remove('selected');
            const fare = parseInt(button.value.split(',')[1]);
            totalFare -= fare;
            updateTotalFare();
            removeSeatFromTable(button.value.split(',')[0]);
            selectedSeats--;
        } else {
            if (selectedSeats < 5) {
                button.classList.add('selected');
                const fare = parseInt(button.value.split(',')[1]);
                totalFare += fare;
                updateTotalFare();
                addSeatToTable(button.value);
                selectedSeats++;
            } else {
                alert('You can select a maximum of 4 seats.');
            }
        }

        updateNoSeatMessage();
    });
});

function addSeatToTable(seatValue) {
    const [seatNumber, fare, name, city] = seatValue.split(',');
    const row = document.createElement('tr');
    row.dataset.seatNumber = seatNumber; // Adding seat number as a data attribute
    row.innerHTML = `
        <td>${selectedSeats}</td>
        <td>${seatNumber}</td>
        <td>${fare}</td>
    `;
    resultTableBody.appendChild(row);
}

function removeSeatFromTable(seatNumber) {
    const rowToRemove = resultTableBody.querySelector(`tr[data-seat-number="${seatNumber}"]`);
    if (rowToRemove) {
        rowToRemove.remove();
    }
}

function updateTotalFare() {
    totalFareElement.textContent = totalFare;
}

function updateNoSeatMessage() {
    if (selectedSeats === 0) {
        noSeatRow.style.display = 'table-row';
    } else {
        noSeatRow.style.display = 'none';
    }
    // Update the value of total selected seats
    const totalSelectedSeatElement = document.getElementById('totalSelectedSeat');
    totalSelectedSeatElement.textContent = selectedSeats-1;
}

