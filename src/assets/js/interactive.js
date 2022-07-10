function toggleTOC(e) {
  let toggle = document.getElementById('toc-toggle');

  var inner = 'close table of contents';
  var expanded = 'true';
  if (toggle.getAttribute('aria-expanded') === 'true') {
    inner = 'open table of contents';
    expanded = 'false';

  }

  toggle.setAttribute('aria-expanded', expanded);

  let span = document.createElement('span');
  span.innerHTML = inner;

  toggle.replaceChild(span, toggle.firstChild);
}
