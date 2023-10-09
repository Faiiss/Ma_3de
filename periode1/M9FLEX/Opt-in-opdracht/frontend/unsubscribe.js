document.addEventListener('DOMContentLoaded', function () {
    const unsubscribeButton = document.getElementById('unsubscribe-button');
    const messageSuccess = document.querySelector('.message.success');
    const messageError = document.querySelector('.message.error');
  
    // Initially hide the messages
    messageSuccess.style.display = 'none';
    messageError.style.display = 'none';
  
    unsubscribeButton.addEventListener('click', function () {
      // Reset messages
      messageSuccess.style.display = 'none';
      messageError.style.display = 'none';
  
      // Simulate a successful unsubscription for demonstration purposes
      // In a real application, you would make an AJAX request to your backend API
      // and handle the response accordingly.
      setTimeout(() => {
        const success = true; // Replace with actual success response from your API
        if (success) {
          messageSuccess.style.display = 'block';
        } else {
          messageError.style.display = 'block';
        }
      }, 1000); // Simulating a delay (1 second) for demonstration
    });
  });
  