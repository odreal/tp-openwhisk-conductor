function main(params) {
    let step = params.$step || 'generate_name'
    delete params.$step
    if(step == 'check_size'){
        if(params.size=='large'){
            step = 'get_weather';
        } else {
            step = 'get_picture';
        }
    }
    switch (step) {
        case 'generate_name': return { action: 'generate_name', params, state: { $step: 'get_info' } }
        case 'get_info': return { action: 'get_info', params, state: { $step: 'check_size' } }
        case 'get_picture': return { action: 'get_picture', params, state: { $step: 'formatter' } }
        case 'get_weather': return { action: 'get_weather', params, state: { $step: 'formatter' } }
        case 'formatter': return { action: 'text_formatter', params, state: { $step: 'end'} }
        default: return {params}
    }
}