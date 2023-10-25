function fetchProducts() {
  let xhr = new XMLHttpRequest();
  let url = '/products';
  xhr.open("GET", url, true);

  xhr.onreadystatechange = function () {
    document.getElementById('tbody').innerHTML = '';

    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);

      if(typeof res.products !== 'undefined') {
        let requiredFields = {
          products: {
            'id': '',
            'title': ''
          },
          variants: {
            'id': '',
            'title': '',
            'price': ''
          }
        }

        let filler = document.createElement('td');
        filler.innerHTML = '';

        res.products.forEach((el) => {
          let productMainRow = document.createElement('tr');
          for(let field in requiredFields.products) {
            requiredFields.products[field] = document.createElement('td');
            requiredFields.products[field].innerHTML = el[field];
            productMainRow.appendChild(requiredFields.products[field]);
          };
          for(let i = 0; i < 3; i++) {
            productMainRow.appendChild(filler.cloneNode(true));
          }

          document.getElementById('tbody').appendChild(productMainRow);

          if(el.variants !== 'undefined') {
            el.variants.forEach((variant) => {
              let variantRow = document.createElement('tr');
              for(let i = 0; i < 2; i++) {
                variantRow.appendChild(filler.cloneNode(true));
              }
              for(let field in requiredFields.variants) {
                requiredFields.variants[field] = document.createElement('td');
                requiredFields.variants[field].innerHTML = variant[field];
                variantRow.appendChild(requiredFields.variants[field]);
              };

              document.getElementById('tbody').appendChild(variantRow);
            });
          }
        })
      }
    }
  }

  xhr.setRequestHeader('Accept', 'application/json');
  xhr.send();
}