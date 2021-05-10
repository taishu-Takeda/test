package jp.co.internous.ecsite.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import jp.co.internous.ecsite.model.dao.UserRepository;
import jp.co.internous.ecsite.model.form.UserForm;


@Controller 
@RequestMapping("/ecsite/admin/user")
public class UserController {
	@Autowired 
	private UserRepository userRepos;
	
	@RequestMapping("/") 
	public String userIndex() {
		return "user";
	}
	
	@RequestMapping("/duplicatedUserName")
	@ResponseBody
	public boolean duplicatedUserName(@RequestBody UserForm f) {

		int count = userRepos.findCountByUserName(f.getUserName());
		return count > 0;
	}
	
	@ResponseBody
	@PostMapping("/registeUser")
	public boolean registeUserApi(@RequestBody UserForm f) {
		int count = userRepos.persist(f.getUserName(), f.getPassword(), f.getFullName()); 
		return count > 0;
	}
}
