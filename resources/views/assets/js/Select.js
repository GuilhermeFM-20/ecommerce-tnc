
class Select extends HTMLElement {
  
    constructor() {
      super();
    }

    connectedCallback() {
    
      const label = this.getAttribute('label') || 'Default Label';
      const id = this.getAttribute('id') || 'default-id';
      const route = this.getAttribute('route') || '';
      const value = this.getAttribute('value') || '';

      changeValues(id,route,value);

      this.innerHTML = `
      <label>${label}</label>
      <select class="form-control" id="input_${id}">
       </select>
       `;

    }

  }

  customElements.define('select-db', Select);