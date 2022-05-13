const companiesRetemplate = (company) => {
    const companyTemp = `
    <div class="card">
        <div class="card-header">
            ${company.name}
        </div>
        <div class="card-body">
            <h5 class="card-title">${company.address1 || ''}</h5>
            <p class="card-text">
            ${company.address2 || ''}, ${company.city || ''}, ${company.state || ''} ${company.zip || ''}
                <br>
                ${company.phone_no || ''}
            </p>
            <a href="#" class="btn btn-primary" data-id="${company.id}">View Company Details</a>
        </div>
    </div>
    `;
    if($('#companyLists #noCompanies').length) {
        $('#companyLists').empty().append(companyTemp);
    } else {
        $('#companyLists').append(companyTemp);
    }
}

$(document).off('click', '#addCompany').on('click', '#addCompany', function(e) {
    e.preventDefault();
    modalLauncher({
        url:'/company/add'
    });
})


$(document).off('click', '#saveCompany').on('click', '#saveCompany', function(e) {
    e.preventDefault();
    const data = $('#addCompanyForm').serializeArray()
    customAjaxCall({
        url: '/company/store',
        method: 'POST',
        data: data,
    }, (resp) => {
        $('#cModal').modal('hide');
        companiesRetemplate(resp);
    }, ({status, responseJSON}) => {
        console.log(status, responseJSON);
        if (status === 422)
        {
            $('#addCompanyForm').find('input[name]').css('border-color', '#ddd');
            $(`input[name]`).siblings(".errorMessage").empty();
            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                $('#addCompanyForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                $(`input[name="${key}"]`).siblings(".errorMessage").append(message);
            }
        }
    })
})

$(document).on('click', '.js-show--company', function(e) {
    e.preventDefault();
    customAjaxCall({
        url:$(this).data('url')
    }, (resp) => {
        $('#mainContainer').empty().append(resp);
    }, (err) => {
        console.log(err);
    })
})





$(document).off('click', '#saveDepartment').on('click', '#saveDepartment', function(e) {
    e.preventDefault();
    const data = $('#addDepartmentForm').serializeArray()
    const companyID = $(this).data('cid');
    customAjaxCall({
        url: `/company/${companyID}/department/store`,
        method: 'POST',
        data: data,
    }, (resp) => {
        $('#cModal').modal('hide');
        departmentFetch(companyID);
    }, ({status, responseJSON}) => {
        console.log(status, responseJSON);
        if (status === 422)
        {
            $('#addDepartmentForm').find('input[name]').css('border-color', '#ddd');
            $(`input[name]`).siblings(".errorMessage").empty();
            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                $('#addDepartmentForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                $(`input[name="${key}"]`).siblings(".errorMessage").append(message);
            }
        }
    })
})

$(document).off('click', '#saveEmployee').on('click', '#saveEmployee', function(e) {
    e.preventDefault();
    const data = $('#addEmployeeForm').serializeArray()
    const companyID = $(this).data('cid');
    customAjaxCall({
        url: `/company/${companyID}/employee/store`,
        method: 'POST',
        data: data,
    }, (resp) => {
        $('#cModal').modal('hide');
        employeeFetch(companyID);
    }, ({status, responseJSON}) => {
        console.log(status, responseJSON);
        if (status === 422)
        {
            $('#addEmployeeForm').find('input[name]').css('border-color', '#ddd');
            $(`input[name]`).siblings(".errorMessage").empty();
            if (!responseJSON.errors) return;
            const messages = [];
            for (const [key, message] of Object.entries(responseJSON.errors)) {
                $('#addEmployeeForm').find(`input[name = "${ key }"]`).css('border-color', '#F44336');
                messages.push(message);
                $(`input[name="${key}"]`).siblings(".errorMessage").empty();
                $(`input[name="${key}"]`).siblings(".errorMessage").append(message);
            }
        }
    })
})


function employeeFetch(company) {
    customAjaxCall({
        url: `/company/${company}/employee/getAll`
    }, (resp) => {
        $('#employeeCards').empty().append(resp);
    }, (err) => {
        console.log(err);
    })

}
function departmentFetch(company) {
    customAjaxCall({
        url: `/company/${company}/department/getAll`
    }, (resp) => {
        $('#departmentCards').empty().append(resp);
    }, (err) => {
        console.log(err);
    })

}
