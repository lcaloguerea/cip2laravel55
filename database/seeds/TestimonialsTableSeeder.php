<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Testimonial;


class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = '¡Muchas gracias por todo! Buenisima experiencia.';
        $testimonial->name    	    = 'Dra. Alice Boyle';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

		$testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Agradezco mucho la atención y excelente estadía.';
        $testimonial->name    	    = 'Carlos Navas';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

		$testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Fue una experiencia buenísima visitar aquí y una estadía excelente y comoda ¡Gracias!';
        $testimonial->name    	    = 'Liam Reucle';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

		$testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Un excelente lugar, muy agradable y tranquilo. Ventajoso que esté dentro de la Universidad. Un excelente servicio de administración y mantención. Siempre muy ordenando y limpio. Para volver.';
        $testimonial->name    	    = 'Pedro Victoriano';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

		$testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Muchas gracias, una excelente estadía, con mucho gusto volveré.';
        $testimonial->name    	    = 'Nadia Ramirez';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Estamos muy agradecidos por nuestra experiencia en este hotel. Buenas intalaciones y excelente anteción de Patricia y Freddy. Gracias.';
        $testimonial->name    	    = 'Elizabeth y Jaime Oyarzo';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Muchas gracias Patricia y Freddy por la cálida acogida. La experencia en el Hotel de la Universidad fue excelente. Ojalá más universidades en el país pudieran tener este tipo de instalaciones que favorecen el intercambio acdémico y la invetigación.';
        $testimonial->name    	    = 'Teresa Oteíza';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Fue una gran experiencia poder estar al interior de la UACh con alojamiento de primera. Me encantó el hotel muy cómodo, limpio y demaciado acogedor, lleno de detalles que hacen de la estadía un momento agradable. Tener desayuno es lo mejor! Y la atención cercana y familiar de Patricia hacen de este lugar un sitio muy especial al que volvería mil veces. Gracias por todo.';
        $testimonial->name    	    = 'Carolina Gatica';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();        

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Muchas gracias por todo, la atención fue excelente, todo esta muy limpio y el servicio ha sido de primera. Además un lugar muy tranquilo, agradable y cerca de la Universidad y el centro. Nada para reclamar.';
        $testimonial->name    	    = 'Javier Sanchez';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();  

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Estuve en el hotel casi 3 semanas, tiempo en el cual conte con un espacio cómodo, tranquilo y acogedor. No me hizo falta nada. El hotel esta muy bien dotado. Por destacar la limpieza y el cuidado por mantener todo en muy buenas condiciones. Especialmente quiero agradecer a Patricia por su hospitalidad, por estar pendiente de mí. Definitivamente es una fotaleza para el hotel que cuenten con una persona como ella. Gracias por recibirme.';
        $testimonial->name    	    = 'Lina Maria Cano';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();    
        
        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Una vez más, una excelente estadía, super cómodo y acogedor. Mi familia y yo nos sentimos super regaloneados por Patricia. Esperamos volver pronto.';
        $testimonial->name    	    = 'Nabila Prohl';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();     

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Otra vez, muchas gracias por todo, el confort, la atención y la ambilidad. Muchisímas gracias, Patricia!';
        $testimonial->name    	    = 'Joan Rodriguez';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Muchas gracias por todo, un excelente lugar para conectarse con la universidad. Cariños';
        $testimonial->name    	    = 'Paula Stange';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save(); 

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Mas que gracias, inmensas gracias por la calidez humana. Al final del día lo más valioso son los servicios y buena onda. Gran abrazo';
        $testimonial->name    	    = 'Raúl Montenegro';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();   

        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Muchas gracias Patricia y Carolina';
        $testimonial->name    	    = 'Alex Valentine';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();      
        
        $testimonial = new Testimonial();

        $testimonial->rate       	= 5;
        $testimonial->comment       = 'Muchas gracias por la excelente atención de Patricia. La habitación y el comedor son muy comodos y bien equipadas. El diseño de la cocina y el baño son muy comodos y perfectos para una estancia de varios días. Esperamos volver pronto.';
        $testimonial->name    	    = 'Myriam Valero ';
        $testimonial->department    = '';
        $testimonial->visibility    = 'yes';
        $testimonial->pAvatar	    = '/img/icons/icon-user.png';
        $testimonial->save();                     
    }
}
