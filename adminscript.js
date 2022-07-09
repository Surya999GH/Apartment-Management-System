const nav = document.querySelector('.AdminHeadbar')
fetch('/AdminTry.html')
.then(res=>res.text())
.then(data=>{
    Try.innerHTML=data
    const parser = new DOMParser()
    const doc = parser.parseFromString(data, 'text/html')
    eval(doc.querySelector('adminscript').textContent)
})