document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('modify-form');
    const messageSuccess = document.querySelector('.message.success');
    const messageError = document.querySelector('.message.error');
  
    // Initially hide the messages
    messageSuccess.style.display = 'none';
    messageError.style.display = 'none';
  
    form.addEventListener('submit', function (e) {
      e.preventDefault();
  
      // Reset messages
      messageSuccess.style.display = 'none';
      messageError.style.display = 'none';
  
      // Get form data
      const email = document.getElementById('email').value;
      const selectedTypes = Array.from(document.getElementById('newsletter-types').selectedOptions).map(option => option.value);
  
      // Perform client-side validation (you can add more validation here)
      if (!isValidEmail(email)) {
        messageError.style.display = 'block';
        return;
      }
  
      // Simulate a successful update for demonstration purposes
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
  
      // Reset the form after submission (optional)
      form.reset();
    });
  
    // Function to validate email format
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
  