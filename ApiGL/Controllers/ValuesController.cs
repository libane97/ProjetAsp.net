﻿using ApiGL.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace ApiGL.Controllers
{
    public class ValuesController : ApiController
    {
        //// GET api/values
        //public IEnumerable<string> Get()
        //{
        //    return new string[] { "value1", "value2" };
        //}
        public bdGLEntities db = new bdGLEntities();


        // GET api/personnes
        public List<Personne> Get()
        {
            return db.Personnes.ToList();
        }
        public Personne GetById(int id)
        {
            return db.Personnes.Where(p => p.IdP == id).FirstOrDefault();
        }

        [HttpPost]
        // POST api/personnes
        public Personne Post([FromBody] Personne personne)
        {

            db.Personnes.Add(personne);
            db.SaveChanges();
            return personne;
        }

        [HttpPut]
        // PUT api/Personnes/5
        public Personne Put([FromBody] Personne personne)
        {
            var P = db.Personnes.Where(p => p.IdP == personne.IdP).FirstOrDefault();
            P.Nom = personne.Nom;
            P.Prenom = personne.Prenom;
            P.Email = personne.Email;
            P.DateNaissance = personne.DateNaissance;
            P.Tel = personne.Tel;
            db.Personnes.Add(P);
            db.Entry(P).State = System.Data.Entity.EntityState.Modified;
            db.SaveChanges();
            return P;
        }

        // DELETE api/personnes/5
        public void Delete(int id)
        {
            var P = db.Personnes.Where(p => p.IdP == id).FirstOrDefault();
            db.Personnes.Remove(P);
            db.SaveChanges();

        }


        //// GET api/values/5
        //public string Get(int id)
        //{
        //    return "value";
        //}

        //// POST api/values
        //public void Post([FromBody]string value)
        //{
        //}

        //// PUT api/values/5
        //public void Put(int id, [FromBody]string value)
        //{
        //}

        //// DELETE api/values/5
        //public void Delete(int id)
        //{
        //}
    }
}
