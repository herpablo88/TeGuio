/********** Validación de formularios **********/
$(document).ready(function() {
    
	//Validaciones - Modificar perfil
		$('.formAdminModifUsuario')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				nombre: {
                    validators: {
                        notEmpty: { message: 'El nombre es requerido' },
						stringLength: { min: 3, max: 50, message: 'El nombre debe tener entre 3 y 50 caracteres' }
                    }
                },
				apellido: {
                    validators: {
                        notEmpty: { message: 'El apellido es requerido' },
						stringLength: { min: 3, max: 50, message: 'El apellido debe tener entre 3 y 50 caracteres' }
                    }
                },
				email: {
                    validators: {
                        notEmpty: { message: 'El email es requerido' },
						emailAddress: { message: 'Ingrese un email válido' }
                    }
                },
				fk_tipo: {
                    validators: {
                        notEmpty: { message: 'El tipo es requerido' },
						integer: { message: 'Tipo debe ser un numero' },
						between: { min: 1, max: 3, message: '1.Admin - 2.Usuario - 3.Profesional' }

                    }
                }
            }
        });
	
	//Validaciones - Nuevo Post
		$('.formAgregarPost')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                descripcion: {
                    validators: {
                        notEmpty: { message: 'Escriba su consulta' },
						stringLength: { min: 15, message: 'Debe ingresar 15 o más caracteres' }
                    }
                }
            }
        });
		
	//Validaciones - Nuevo Post
		$('.formResponderPost')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                descripcion: {
                    validators: {
                        notEmpty: { message: 'Escriba su comentario' },
						stringLength: { min: 15, message: 'Debe ingresar 15 o más caracteres' }
                    }
                }
            }
        });
	
	//Validaciones - Registrar Profesional
	$('.formRegProfesional')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				nombre: {
                    validators: {
                        notEmpty: { message: 'El nombre es requerido' },
						stringLength: { min: 3, max: 50, message: 'El nombre debe tener entre 3 y 50 caracteres' }
                    }
                },
				apellido: {
                    validators: {
                        notEmpty: { message: 'El apellido es requerido' },
						stringLength: { min: 3, max: 50, message: 'El apellido debe tener entre 3 y 50 caracteres' }
                    }
                },
				email: {
                    validators: {
                        notEmpty: { message: 'El email es requerido' },
						emailAddress: { message: 'Ingrese un email válido' }
                    }
                },
				dni: {
                    validators: {
                        notEmpty: { message: 'El DNI es requerido' },
                        integer: { message: 'DNI debe ser un numero' },
						stringLength: { min: 8, max: 8, message: 'El dni debe tener 8 caracteres' }
                    }
				},
				password: {
                    validators: {
                        notEmpty: { message: 'La contraseña es requerida' },
						stringLength: { min: 6, message: 'La contraseña debe tener 6 o más caracteres' }
                    }
                },
				confirmaPassword: {
                    validators: {
                        notEmpty: { message: 'La contraseña es requerida' },
						stringLength: { min: 6, message: 'La contraseña debe tener 6 o más caracteres' },
						identical: { field: 'password', message: 'Las contraseñas no coinciden' }
                    }
                },
				matricula: {
                    validators: {
                        notEmpty: { message: 'La matrícula es requerida' },
                        integer: { message: 'Matrícula debe ser un numero' },
						stringLength: { min: 5, message: 'Ingrese una matrícula válida' }

                    }
				},
            }
        });
	
	//Validaciones - Registrar Usuario
	$('#particularForm')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				nombre: {
                    validators: {
                        notEmpty: { message: 'El nombre es requerido' },
						stringLength: { min: 3, max: 50, message: 'El nombre debe tener entre 3 y 50 caracteres' }
                    }
                },
				apellido: {
                    validators: {
                        notEmpty: { message: 'El apellido es requerido' },
						stringLength: { min: 3, max: 50, message: 'El apellido debe tener entre 3 y 50 caracteres' }
                    }
                },
				email: {
                    validators: {
                        notEmpty: { message: 'El email es requerido' },
						emailAddress: { message: 'Ingrese un email válido' }
                    }
                },
				dni: {
                    validators: {
                        notEmpty: { message: 'El DNI es requerido' },
                        integer: { message: 'DNI debe ser un numero' },
						stringLength: { min: 8, max: 8, message: 'El dni debe tener 8 caracteres' }

                    }
				},
				password: {
                    validators: {
                        notEmpty: { message: 'La contraseña es requerida' },
						stringLength: { min: 6, message: 'La contraseña debe tener 6 o más caracteres' }
                    }
                },
				confirmaPassword: {
                    validators: {
                        notEmpty: { message: 'La contraseña es requerida' },
						stringLength: { min: 6, message: 'La contraseña debe tener 6 o más caracteres' },
						identical: { field: 'password', message: 'Las contraseñas no coinciden' }
                    }
                }
            }
        });
	
	//Validaciones - Modificar perfil
	$('#formModifPerfil')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				nombre: {
                    validators: {
                        notEmpty: { message: 'El nombre es requerido' },
						stringLength: { min: 3, max: 50, message: 'El nombre debe tener entre 3 y 50 caracteres' }
                    }
                },
				apellido: {
                    validators: {
                        notEmpty: { message: 'El apellido es requerido' },
						stringLength: { min: 3, max: 50, message: 'El apellido debe tener entre 3 y 50 caracteres' }
                    }
                },
				email: {
                    validators: {
                        notEmpty: { message: 'El email es requerido' },
						emailAddress: { message: 'Ingrese un email válido' }
                    }
                }
            }
        });
	
	//Validaciones - Agregar Usuario a cargo
	$('#formUCAdd')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                dni: {
                    validators: {
                        notEmpty: { message: 'El DNI es requerido' },
                        integer: { message: 'DNI debe ser un numero' },
						stringLength: { min: 8, max: 8, message: 'El dni debe tener 8 caracteres' }

                    }
				},
				nombre: {
                    validators: {
                        notEmpty: { message: 'El nombre es requerido' },
						stringLength: { min: 3, max: 50, message: 'El nombre debe tener entre 3 y 50 caracteres' }
                    }
                },
				apellido: {
                    validators: {
                        notEmpty: { message: 'El apellido es requerido' },
						stringLength: { min: 3, max: 50, message: 'El apellido debe tener entre 3 y 50 caracteres' }
                    }
                }
            }
        });
		
		//Validaciones - Editar Usuario a cargo
		$('#formUCEdit')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nombre: {
                    validators: {
                        notEmpty: { message: 'El nombre es requerido' },
						stringLength: { min: 3, max: 50, message: 'El nombre debe tener entre 3 y 50 caracteres' }
                    }
                },
				apellido: {
                    validators: {
                        notEmpty: { message: 'El apellido es requerido' },
						stringLength: { min: 3, max: 50, message: 'El apellido debe tener entre 3 y 50 caracteres' }
                    }
                }
            }
        });
		
		//Validaciones - CV Usuario a cargo
		$('#formCVUC')
        .on('init.field.fv', function(e, data) {
            
            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-fv-icon-for="' + data.field + '"]');

            $icon.on('click.clearing', function() {
                if ($icon.hasClass('glyphicon-remove')) {
                    data.fv.resetField(data.element);
                }
            });
        })
		.formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                edad_post: {
                    validators: {
                        notEmpty: { message: 'La edad es requerida' },
                        integer: { message: 'La edad debe ser un número' },
						stringLength: { max: 2, message: 'Ingrese una edad válida' }

                    }
				},
				direccion_post: {
                    validators: {
                        notEmpty: { message: 'La dirección es requerida' },
						stringLength: { min: 6, max: 50, message: 'Dirección debe tener entre 6 y 50 caracteres' }
                    }
                },
				email_post: {
                    validators: {
                        notEmpty: { message: 'El email es requerido' },
						emailAddress: { message: 'Ingrese un email válido' }
                    }
                },
				exp_laboral_post: {
                    validators: {
                        notEmpty: { message: 'La experiencia laboral es requerida. De no poseer experiencia, ingrese "Sin experiencia"' },
						stringLength: { min: 10, message: 'Debe ingresar 10 o más caracteres' }
                    }
                },
				conocimientos_post: {
                    validators: {
                        notEmpty: { message: 'Los conocimientos son requeridos. De no poseer, ingrese "Sin conocimientos"' },
						stringLength: { min: 10, message: 'Debe ingresar 10 o más caracteres' }
                    }
                },
				educacion_post: {
                    validators: {
                        notEmpty: { message: 'La educación es requerida. De no poseer, ingrese "Sin educación"' },
						stringLength: { min: 6, message: 'Debe ingresar 6 o más caracteres' }
                    }
                }
            }
        });
		//Fin de las validaciones
});
