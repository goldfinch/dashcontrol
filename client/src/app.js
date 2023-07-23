window.onerror = function (error, source, lineno, colno) {

  // Print the error message
  let output = document.getElementById("result");
  output.innerHTML += "Message : " + error + "<br>";

  // Print the url of the file that contains the error
  output.innerHTML += "Url : " + source + "<br>";

  // Print the line number from which the error generated
  output.innerHTML += "Line number : " + lineno + "<br>";

  // Print the column number of the error line
  output.innerHTML += "Column number : " + colno + "<br>";

  if (error) {
    // Print he error object
    output.innerHTML += "Error Object : " + error;
  }
}

document.addEventListener('DOMContentLoaded', () => {

  let controlelements = document.getElementsByClassName('controlelements')[0];

  if (controlelements) {

    let elements = document.querySelectorAll('[data-ss-element]');

    if (elements.length) {

      elements.forEach((el, key) => {

        // let rect = el.getBoundingClientRect();
        let elCtrl = document.createElement('a');
        elCtrl.setAttribute('href', el.getAttribute('data-href'))
        elCtrl.style.top = el.offsetTop + 'px';
        elCtrl.style.height = el.clientHeight + 'px';

        elCtrl.addEventListener('mouseover', (e) => {

          el.style.filter = 'grayscale(1) blur(1px)';

        });
        elCtrl.addEventListener('mouseout', (e) => {

          el.style.filter = '';

        });

        controlelements.appendChild(elCtrl)
      })
    }
  }

});
