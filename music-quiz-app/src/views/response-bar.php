<?php
// filepath: music-quiz-app/music-quiz-app/src/views/response-bar.php

?>

<div class="response-bar">
    <form id="responseForm" method="POST" action="submit-answer.php">
        <input type="text" name="user_answer" placeholder="Type your answer here..." required>
        <button type="submit">Submit</button>
    </form>
    <div id="responseMessage"></div>
</div>

<script>
    document.getElementById('responseForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        
        fetch('submit-answer.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            const messageDiv = document.getElementById('responseMessage');
            if (data.success) {
                messageDiv.innerHTML = '<p class="success">Correct! Well done!</p>';
            } else {
                messageDiv.innerHTML = '<p class="error">Incorrect. Try again!</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

<style>
    .response-bar {
        margin: 20px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .response-bar input {
        padding: 5px;
        width: 70%;
        margin-right: 10px;
    }
    .response-bar button {
        padding: 5px 10px;
    }
    .success {
        color: green;
    }
    .error {
        color: red;
    }
</style>