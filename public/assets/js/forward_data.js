/**
 * 
 * @param {String} name 
 * @param {String<JSON>} arr 
 */
function forwardData(name, arr) {
  sessionStorage.setItem(name, JSON.stringify(arr));
}