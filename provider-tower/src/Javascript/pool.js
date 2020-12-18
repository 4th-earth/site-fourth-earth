// window.axios.post("http://tower.earth.fourth:8888/roll", {
//   "dice-pool-1-roll":4,
//   "dice-pool-1-sides":2,
//   "_token":document.querySelector("[name='_token']").value
// }).then(function(response) {
//   console.log(response.data)
// })
// function rollDice(event) {
//   event.preventDefault();
//   let form = document.getElementById("dice-tower");
//
//   form.querySelectorAll("section").forEach(function(pool) {
//     let id = pool.getAttribute("id");
//     let rollId = id + "-roll";
//     let sidesId = id + "-sides";
//
//     let p = {};
//     p["_token"] = form.querySelector("[name='_token']").value;
//     p[rollId] = parseInt(document.getElementById(rollId).value);
//     p[sidesId] = parseInt(document.getElementById(sidesId).value);
//
//     window.axios.post("http://tower.earth.fourth:8888/roll", p).then(function(response)
//     {
//       let container = document.getElementById(id + "-results");
//       let toReplace = container.childNodes[1];
//       let replacement = document.createRange().createContextualFragment(response.data);
//       container.replaceChild(replacement, toReplace);
//     });
//   });
// }
//
// function addPool() {
//   console.log("duplicate pool");
// }
