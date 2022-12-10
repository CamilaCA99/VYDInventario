const disable = () => {
    const disable = document.getElementById('categories_form');
    const btn = document.getElementById('btn-form-add-category');
    if(disable.classList.contains('hidden')){
        disable.classList.remove('hidden');
        btn.textContent = 'Cancelar'
        btn.classList.add('bg-red-600');
    }else{
        disable.classList.add('hidden');
        btn.textContent = 'Agregar'
        btn.classList.remove('bg-red-600');
    }
}