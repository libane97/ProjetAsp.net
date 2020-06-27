using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;
namespace WcfGL.Models
{
    public class Personne
    {

        [Key, DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int IdP { get; set; }

        [Display(Name = "Nom "), Required(ErrorMessage = "*"), MaxLength(180)]
        public String Nom { get; set; }
        [Display(Name = "Prenom "), Required(ErrorMessage = "*"), MaxLength(180)]
        public String Prenom { get; set; }

        [Display(Name = "Email "), Required(ErrorMessage = "*"), MaxLength(180)]
        public String Email { get; set; }

        [Display(Name = "Tel")]
        public String Tel { get; set; }

        [Display(Name = "DateNaissance")]
        public DateTime DateNaissance { get; set; }
    }
}