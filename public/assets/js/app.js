async function copyTextById(elementId) {
  const element = document.getElementById(elementId);

  if (!element) {
    alert('Nothing found to copy.');
    return;
  }

  const text = element.innerText.trim();

  try {
    await navigator.clipboard.writeText(text);
    alert('Copied.');
  } catch (error) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.select();

    document.execCommand('copy');

    document.body.removeChild(textArea);

    alert('Copied.');
  }
}