var persona = {
    edad: 23,
    nombre: "Sarah",
    apellido: "Rodriguez",
    sexo: "F",
    estado_civil: "Soltera",
    aPeliculas: ["Mementos", "Avengers: Infinity Wars", "Soy leyenda"],

    comer: function(comida){
        console.log(`Estoy comiendo: ${comida}`);
    },

    cumplirAnios: function(){
        persona.edad++;
    }
};

console.log(persona);
persona.comer("fideos");
persona.cumplirAnios();
console.log(persona);

