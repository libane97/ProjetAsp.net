using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;
using WcfGL.Models;

namespace WcfGL
{
    // REMARQUE : vous pouvez utiliser la commande Renommer du menu Refactoriser pour changer le nom de classe "Service1" dans le code, le fichier svc et le fichier de configuration.
    // REMARQUE : pour lancer le client test WCF afin de tester ce service, sélectionnez Service1.svc ou Service1.svc.cs dans l'Explorateur de solutions et démarrez le débogage.
    public class Service1 : IService1
    {
        public BdGLContext db = new BdGLContext();
        public bool AddPersonne(Personne personne)
        {
            bool rep = false;
            try
            {
                db.Personnes.Add(personne);
                db.SaveChanges();
                rep = true;
            }
            catch (Exception)
            {

            }
            return rep;
        }

        public bool DeletePersonne(int id)
        {
            bool rep = false;
            try
            {
                Personne personne = db.Personnes.Find(id);
                db.Personnes.Remove(personne);
                db.SaveChanges();
                rep = true;
            }
            catch (Exception)
            {

            }
            return rep;
        }

        public string GetData(int value)
        {
            return string.Format("You entered: {0}", value);
        }

        public CompositeType GetDataUsingDataContract(CompositeType composite)
        {
            if (composite == null)
            {
                throw new ArgumentNullException("composite");
            }
            if (composite.BoolValue)
            {
                composite.StringValue += "Suffix";
            }
            return composite;
        }

        public List<Personne> GetListePersonne()
        {
            return db.Personnes.ToList();
        }

        public Personne GetPersonneById(int id)
        {
            return db.Personnes.Find(id);
        }

        public bool UpdatePersonne(Personne personne)
        {
            bool rep = false;
            try
            {
                db.Entry(personne).State = EntityState.Modified;
                db.SaveChanges();
                rep = true;
            }
            catch (Exception)
            {

            }
            return rep;
        }
    }
}
