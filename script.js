$(document).ready(function () {
    $("#bode").hide();
    $("#esconde").show();
    $("#bode2").hide();
    $("#esconde2").show();
    $("#parar").hide(); // Hide the "STOP" button initially
});

var timeoutRefs = []; // Array to store setTimeout references

function enviar() {
    // Clear previous results
    $(".live").html("");
    $(".dead").html("");

    var comboList = $("#lista").val().trim();

    if (comboList === "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter CC combos in the text area.',
        });
        return;
    }

    var comboLines = comboList.split("\n");
    var invalidCombos = [];

    // Validate input format for each combo
    for (var i = 0; i < comboLines.length; i++) {
        var combo = comboLines[i].trim();
        if (!isValidCombo(combo)) {
            invalidCombos.push({ line: i + 1, combo: combo });
        }
    }

    if (invalidCombos.length > 0) {
        var errorMessage = 'Invalid CC format at the following line(s):';
        for (var i = 0; i < invalidCombos.length; i++) {
            errorMessage += '\nLine ' + invalidCombos[i].line + ': ' + invalidCombos[i].combo;
        }

        Swal.fire({
            icon: 'error',
            title: 'Invalid Format',
            text: errorMessage,
        });
        return;
    }

    var total = comboLines.length;
    var ap = 0;
    var rp = 0;

    comboLines.forEach(function (value, index) {
        var timeoutRef = setTimeout(function () {
            $.ajax({
                url: 'api.php?lista=' + value,
                type: 'GET',
                async: true,
                success: function (resultado) {
                    if (resultado.match("#Aprovada")) {
                        removelinha();
                        ap++;
                        live(resultado + "");
                    } else {
                        removelinha();
                        rp++;
                        dead(resultado + "");
                    }

                    $('#carregadas').html(total);
                    var fila = parseInt(ap) + parseInt(rp);
                    $('#cLive').html(ap);
                    $('#cDie').html(rp);
                    $('#total').html(fila);
                    $('#cLive2').html(ap);
                    $('#cDie2').html(rp);

                    // Auto-scroll to live and dead sections
                    scrollToBottom(".live");
                    scrollToBottom(".dead");

                    // Check if all combos have been processed
                    if (fila === total) {
                        showSuccessPopUp(total, ap, rp);
                        $("#parar").hide(); // Hide the "STOP" button when processing is complete
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while checking CCs. Please try again later.',
                    });
                }
            });
        }, 500 * index);
        timeoutRefs.push(timeoutRef); // Store the setTimeout reference in the array
    });

    $("#parar").show(); // Show the "STOP" button when processing starts
}

function live(str) {
    $(".live").append(str + "<br>");
}

function dead(str) {
    $(".dead").append(str + "<br>");
}

function removelinha() {
    var lines = $("#lista").val().split('\n');
    lines.splice(0, 1);
    $("#lista").val(lines.join("\n"));
}

function isValidCombo(combo) {
    // Updated regex to validate the format of CC combos.
    var ccRegex = /^\d{16}\|\d{2}\|\d{4}\|\d{3}$/;
    return ccRegex.test(combo);
}

function scrollToBottom(element) {
    var objDiv = $(element)[0];
    objDiv.scrollTop = objDiv.scrollHeight;
}

function showSuccessPopUp(total, ap, rp) {
    var successMessage = 'CC Checking Complete\n\n';
    successMessage += 'Total: ' + total + '\n';
    successMessage += 'Live: ' + ap + '\n';
    successMessage += 'Dead: ' + rp + '\n';

    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: successMessage,
    });
}

$(document).ready(function () {
    $("#bode").hide();
    $("#bode2").hide();

    $("#showHideLive").click(function () {
        $("#bode").slideToggle();
    });

    $("#showHideDead").click(function () {
        $("#bode2").slideToggle();
    });

    $("#limpar").click(function () {
        clearResults();
    });
});

function clearResults() {
    $(".live").html(""); // Clear the live results
    $(".dead").html(""); // Clear the dead results
    $("#cLive").html("0"); // Reset live count to 0
    $("#cDie").html("0"); // Reset dead count to 0
    $("#total").html("0"); // Reset total count to 0
    $("#cLive2").html("0"); // Reset live count in the summary section to 0
    $("#cDie2").html("0"); // Reset dead count in the summary section to 0
}




// TELEGRAM CONNECT

function showTelegramPopup() {
    Swal.fire({
        title: 'Connect Your Telegram Bot',
        html: '<input type="text" id="telegramToken" class="swal2-input" placeholder="Enter your Telegram bot token">',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        preConfirm: () => {
            const token = document.getElementById('telegramToken').value;
            // Send the token to the server-side for storage and further processing
            // You need to implement this part using AJAX or fetch
            // Example using fetch:
            fetch('/store-telegram-token', {
                method: 'POST',
                body: JSON.stringify({ token }),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to store token');
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle the server's response or show a success message
                    Swal.fire('Success!', 'Your Telegram bot is connected.', 'success');
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Failed to connect your Telegram bot.', 'error');
                });
        },
    });
}